<template>
  <v-app id="inspire">
    <v-app-bar extended>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-app-bar-title>Application</v-app-bar-title>

      <v-spacer></v-spacer>

      <v-btn icon="mdi-dots-vertical">
      </v-btn>
    </v-app-bar>

    <v-main>
      <v-container>
        <v-row>
          <v-col
            v-for="n in users.length"
            :key="n"
            cols="4"
          >
          <v-card
              class="mx-auto"
              max-width="400"
            >
              <v-img
                class="align-end text-white"
                height="200"
                :src="users[n -1].avatar"
                cover
              >
                <!-- <v-card-title class="black">{{ users[n -1].name }}</v-card-title> -->
              </v-img>

              <v-card-title class="black pt-4">
                {{ users[n -1].name }}
              </v-card-title>

              <v-card-text>

                <div>{{ users[n -1].description }}</div>
              </v-card-text>

              <v-card-actions>
                <v-btn v-if="likingArray.includes(users[n -1].id)" color="orange">
                  いいね済み
                </v-btn>
                <v-btn v-else-if="users[n -1].id != authUser.id" color="orange" @click="like(users[n -1].id)">
                  いいね
                </v-btn>

                <a :href="'https://twitter.com/' + users[n - 1].nickname" target="_blank">
                  <v-btn color="orange">
                    ツイッター
                  </v-btn>
                </a>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import axiosClient from "../axios";
import { mapGetters } from 'vuex';

    export default {
        name: "TopPage",

        data: function() {
            return {
              loading: true,
              users: {},
              likingArray: [],
            }
        },

        mounted() {
            this.getUsers();
            this.getLikings();
        },

        methods: {
          getUsers: function() {
            axiosClient.get('/users')
                .then(response => {
                    if (response) {
                        this.users = response.data.data;
                    }
                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;
                });
          },
          like: function(likedUserId) {
            axiosClient.post('/likes', {liking_user_id: this.authUser.id, liked_user_id: likedUserId})
                .then(response => {
                    if (response) {
                      this.likingArray.push(likedUserId);
                      alert("いいねしました");
                    }
                })
                .catch(error => {
                });
          },
          getLikings: function() {
            axiosClient.get('/likings')
                .then(response => {
                    if (response) {
                      this.likingArray = response.data;
                    }
                })
                .catch(error => {
                });
          },
        },

        computed: {
            ...mapGetters({
              // this.authUserをthis.$store.getters.authUserにマッピングさせる
                authUser: 'authUser',
            })
        },
    }
</script>

<style scoped>
  .black {
    color: black;
  }
</style>