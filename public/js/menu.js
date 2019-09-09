$(document).ready(() => {
    $("#header__icon").on("click", (e) => {
        e.preventDefault();
        $(".admin_menu_list").fadeToggle();
    });
});
