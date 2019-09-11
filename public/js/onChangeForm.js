$("select").change((e) => {
    if ($(e.currentTarget).hasClass("alert-danger")) {
        $(e.currentTarget).removeClass("alert-danger");
    }
    if ($(e.currentTarget).next().length !== 0) {
        $(e.currentTarget)
            .next()
            .remove();
    }
});
