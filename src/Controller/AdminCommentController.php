<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @Route("/admin")
 */
class AdminCommentController extends AbstractController
{
    private $repository;
    private $entityManager;

    public function __construct(CommentRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/liste-des-commentaires", name="admin_comments")
     * @param UserRepository $repository
     * @return Response
     */
    public function index(): Response
    {
        $comments = $this->repository->findAll();
        return $this->render('admin/comments.html.twig', [
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/commentaire/suppression/{id}", name="admin_comment_show")
     * @param Comment $comment
     * @param Request $request
     */
    public function showComment(Comment $comment, Request $request)
    {
        return $this->render('admin/comment/showComment.html.twig', [
            'comment' => $comment,
        ]);
    }

    /**
     * @Route("/commentaire/{id}", name="admin_comment_delete", methods="DELETE")
     * @param Comment $comment
     * @param Request $request
     */
    public function delete(Comment $comment, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $comment->getId(), $request->get('_token'))) {
            $this->entityManager->remove($comment);
            $this->entityManager->flush();
            $this->addFlash('success', 'Commentaire supprimé avec succès');
            return $this->redirectToRoute('admin_comments');
        }
    }
}
