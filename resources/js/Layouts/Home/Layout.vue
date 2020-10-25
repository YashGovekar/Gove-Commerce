<style scoped>
    @import "./assets/css/bootstrap.min.css";
    @import "./assets/css/price-range.css";
    @import "./assets/css/animate.css";
    @import "./assets/css/main.css";
    @import "./assets/css/responsive.css";
</style>

<template>
    <div>
        <Header/>
        <slot/>
        <Footer/>
    </div>
</template>

<script>
    import Header from "./Header";
    import Footer from "./Footer";

    require('./assets/js/html5shiv.js');

    export default {
        name: "Layout",
        components: {
            Footer,
            Header
        }
    }
</script>
