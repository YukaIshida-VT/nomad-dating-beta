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
            v-for="n in 24"
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
                src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                cover
              >
                <v-card-title>Top 10 Australian beaches</v-card-title>
              </v-img>

              <v-card-subtitle class="pt-4">
                Number 10
              </v-card-subtitle>

              <v-card-text>
                <div>Whitehaven Beach</div>

                <div>Whitsunday Island, Whitsunday Islands</div>
              </v-card-text>

              <v-card-actions>
                <v-btn color="orange">
                  Share
                </v-btn>

                <v-btn color="orange">
                  Explore
                </v-btn>
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

    export default {
        name: "TopPage",

        data: function() {
            return {
              loading: true,
              users: {},
            }
        },

        mounted() {
            this.getUsers();
        },

        methods: {
          getUsers: function() {
            axiosClient.get('/users')
                .then(response => {
                    if (response) {
                        this.users = response.data;
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