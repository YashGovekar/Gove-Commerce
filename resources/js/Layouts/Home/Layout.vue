<style scoped>

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
