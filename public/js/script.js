var $collectionHolder;
var $collectionHolder2;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="btn btn-primary">Ajouter une photo</button>');
var $newLinkLi = $('<li class="list-unstyled"></li>').append($addTagButton);

var $addVideoButton = $('<button type="button" class="btn btn-primary">Ajouter une vidéo</button>');
var $newLinkLi2 = $('<li class="list-unstyled"></li>').append($addVideoButton);


jQuery(document).ready(function () {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.pictureTricks');
    $collectionHolder2 = $('ul.videoTricks');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);
    $collectionHolder2.append($newLinkLi2);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);
    $collectionHolder2.data('index', $collectionHolder2.find(':input').length);

    $addTagButton.on('click', function (e) {
        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });
    $addVideoButton.on('click', function (e) {
        // add a new tag form (see next code block)
        addTagForm($collectionHolder2, $newLinkLi2);
    });
});

function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li class="list-unstyled"></li>').append(newForm);
    $newLinkLi.before($newFormLi);
    addTagFormDeleteLink($newFormLi);
}

function addTagFormDeleteLink($tagFormLi) {
    var $removeFormButton = $('<button type="button" class="btn btn-danger mb-4">Supprimer</button>');
    $tagFormLi.append($removeFormButton);

    $removeFormButton.on('click', function (e) {
        // remove the li for the tag form
        $tagFormLi.remove();
    });
}