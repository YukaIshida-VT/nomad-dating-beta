<template>
  App.vue
  <router-view></router-view>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: "App",

        props: [
            'user'
        ],

        computed: {
            ...mapGetters({
                authUser: 'authUser',
            })
        },

        components: {
        },

        mounted() {
        },

        created() {
            this.title = this.$route.meta.title;
        },

        data: function () {
            return {
            }
        },

        methods: {
        },

        watch: {
        }
    }
</script>