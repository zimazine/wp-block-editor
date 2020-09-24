/*************************************************
// 目次ハイライト
**************************************************/
function mkj_highlighter() {
echo <<< EOM
<script>
if(window.matchMedia('(min-width:1030px)').matches){
const mkjHighlight = (e) => {
    const hashes = document.querySelectorAll('.mkj-side-style a');
    const sy = window.pageYOffset;
    const ey = sy + document.documentElement.clientHeight;
    let focusEl = [null,null];
    hashes.forEach( (el) => {
        const targetEl = document.querySelector(el.hash);
        const y = sy + targetEl.getBoundingClientRect().top ;
        el.closest('.mkj-list li').classList.remove('mkj-marker');
        el.classList.remove("mkj-active") ;
        if(sy < y &&  y < ey && !focusEl[1]){focusEl[1] = el;focusEl[0] = null;}
        if(sy > y) focusEl[0] = el;
    });
    if (focusEl.length) focusEl.forEach((el) => {
        el && el.classList.add("mkj-active");
        el && el.closest('.mkj-list > li').classList.add('mkj-marker');
        el && el.scrollIntoView({
            block: 'nearest'
        });
    });
};
focus();
window.addEventListener("scroll", mkjHighlight);
}
</script>
EOM;
}
add_action( 'wp_print_footer_scripts', 'mkj_highlighter' );