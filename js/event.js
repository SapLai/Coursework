function displayPopup() {
    $("#site").addClass('popup-open');
}

function closePopup(redirectUrl) {
    $('#site').removeClass('popup-open');

    if (redirectUrl) window.location.href = redirectUrl;
}