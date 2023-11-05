<template>
  <v-app>
    <v-card width="400px" class="mx-auto mt-5">
    <v-card-text>
      <v-form>
        <v-card-actions class="d-flex jc-center">
          <v-btn 
          class="info fs-17" 
          prepend-icon="mdi-twitter"
          @click="twitterLogin">
          <h1 class="display-1">ツイッターログイン</h1>
        </v-btn>
        </v-card-actions>
      </v-form>
    </v-card-text>
  </v-card>
</v-app>
</template>

<script>
    export default {
        name: "Login",

        data: function() {
            return {
              loading: true,
              users: {},
            }
        },

        methods: {
          twitterLogin: function() {
            axios.get('auth/twitter/login')
                .then(response => {
                    if (response) {
                        console.log(response.data);
                    }
                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;
                });
            },
          },
    }
</script>

<style scoped>
  .fs-17 {
    font-size: 17px;
  }
  .d-flex {
    display: flex;
  }
  .jc-center {
    justify-content: center;
  }
</style>