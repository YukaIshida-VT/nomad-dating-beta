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
            // this.$store.dispatch('fetchAuthUser');
        },

        created() {
            this.title = this.$route.meta.title;

            window.axios.interceptors.request.use(
                (config) => {
                    if (config.method === 'get') {
                        config.url = config.url + '?api_token=' + this.user.api_token;
                    } else {
                        config.data = {
                            ...config.data,
                            api_token: this.user.api_token
                        };
                    }
                    return config;
                }
            )
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