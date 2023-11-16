<template>
  <v-app id="inspire">
    <v-app-bar extended>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-app-bar-title>プロフィール</v-app-bar-title>

      <v-spacer></v-spacer>

      <v-btn icon="mdi-dots-vertical">
      </v-btn>
    </v-app-bar>

    <v-main>
      <div class="text-center div-black">
        <form @submit.prevent="submit">
          <v-text-field
            v-model="form.country"
            :counter="10"
            :error-messages="errorMessage.country"
            label="居住国/住んでみたい国"
          ></v-text-field>

          <v-text-field
            v-model="form.occupation"
            :error-messages="errorMessage.occupation"
            label="職業"
          ></v-text-field>

          <v-select
            v-model="form.gender"
            :items="genders"
            :error-messages="errorMessage.gender"
            label="性別"
          ></v-select>

          <v-select
            v-model="form.looking_for"
            :items="lookingFors"
            :error-messages="errorMessage.looking_for"
            label="探している相手"
          ></v-select>

          <v-text-field
            v-model="form.comment"
            :counter="300"
            :error-messages="errorMessage.comment"
            label="自己紹介"
          ></v-text-field>

          <v-checkbox
            v-model="form.is_nomad"
            :error-messages="errorMessage.is_nomad"
            value="1"
            label="ノマド達成済みか"
            type="checkbox"
          ></v-checkbox>

          <v-btn
            class="me-4"
            type="submit"
            @click="submitForm"
          >
            submit
          </v-btn>

        </form>
      </div>
    </v-main>
  </v-app>
</template>

<script>
import { useField, useForm } from 'vee-validate'
import { mapGetters } from 'vuex';
import axiosClient from "../axios";

    export default {
        name: "ProfileCreate",

        components: {
        },

        data: function() {
            return {
                errors: null,
                loading: true,
                day: null,
                yyyymmdd: null,
                loading: true,

                form: {
                    'country': '',
                    'is_nomad': '',
                    'occupation': '',
                    'looking_for': '',
                    'gender': '',
                    'comment': '',
                },
                errorMessage: {
                    'country': '',
                    'is_nomad': '',
                    'occupation': '',
                    'looking_for': '',
                    'gender': '',
                    'comment': '',
                },
                lookingFors: [ '友達', '恋人', '両方' ],
                genders: [ '女性', '男性'],
            }
        },

        mounted() {
          this.getProfile();
        },

        methods: {
          submitForm: function() {
            this.form.is_nomad = (this.form.is_nomad == 1) ? 1 : 0;

            axiosClient.post('/profiles', this.form)
                .then(response => {
                    alert("保存しました");
                    this.$router.push('/top');
                })
                .catch(errors => {
                    console.log(errors.response.data.errors);
                    const resErrors = errors.response.data.errors;
                    if (resErrors) {
                      this.errorMessage.country = resErrors.country ? resErrors.country[0] : '';
                      this.errorMessage.is_nomad = resErrors.is_nomad ? resErrors.is_nomad[0] : '';
                      this.errorMessage.occupation = resErrors.occupation ? resErrors.occupation[0] : '';
                      this.errorMessage.looking_for = resErrors.looking_for ? resErrors.looking_for[0] : '';
                      this.errorMessage.comment = resErrors.comment ? resErrors.comment[0] : '';
                      this.errorMessage.gender = resErrors.gender ? resErrors.gender[0] : '';
                    }
                });
            },
          getProfile: function() {
            axiosClient.get('/get_profile')
                .then(response => {
                  let profile = response.data;
                  this.form.country = profile.country;
                  this.form.is_nomad = profile.is_nomad;
                  this.form.occupation = profile.occupation;
                  this.form.looking_for = profile.looking_for;
                  this.form.gender = profile.gender;
                  this.form.comment = profile.comment;
                })
                .catch(errors => {
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
  .div-black {
    padding: 1px 15px;
  }
</style>