<template>
    <v-dialog max-width="400">
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
                class="button"
                v-bind="activatorProps"
                text="Вход"
                variant="flat"
            ></v-btn>
        </template>

        <template v-slot:default="{ isActive }">
            <v-card title="Вход" class="enterance">
                <div class="container">
                    <v-sheet class="mx-auto" width="350">
                        <v-form @submit.prevent>
                            <v-text-field
                                v-model="email"
                                label="E-mail"
                            ></v-text-field>
                            <!-- <v-btn class="mt-2" type="submit" block>Submit</v-btn> -->
                        </v-form>
                    </v-sheet>

                    <v-sheet class="mx-auto" width="350">
                        <v-form @submit.prevent>
                            <v-text-field
                                v-model="password"
                                type="password"
                                label="Пароль"
                            ></v-text-field>
                        </v-form>
                    </v-sheet>
                </div>

                <v-card-actions>
                    <v-spacer> </v-spacer>

                    <v-btn text="Подтвердить" @click.prevent="autorize"></v-btn>

                    <v-btn
                        text="Закрыть"
                        @click="isActive.value = false"
                    ></v-btn>
                </v-card-actions>
            </v-card>
        </template>
    </v-dialog>
</template>

<style scoped>
.button {
    background-color: #c7ffba;
    color: #037247;
    width: 200px;
    height: 50px;
    border-radius: 20px;
    font-size: 14px;
    margin-bottom: 15px;
}
.v-btn {
    background-color: #c7ffba;
    color: #037247;
}
.checkbox {
    margin-left: 50px;
}
</style>

<script setup>
import axios from "axios";
import { ref } from "vue";
import Cookies from "js-cookie";
import router from "../router/router";

const dialog = ref(false);
const email = ref(null);
const password = ref(null);

const autorize = () => {
    axios.get("/sanctum/csrf-cookie").then((response) => {
        const xsrfToken = Cookies.get("XSRF-TOKEN");
        localStorage.setItem("x_xsrf_token", xsrfToken);

        axios
            .post(
                "/login",
                { email: email.value, password: password.value },
                {
                    headers: {
                        "X-XSRF-TOKEN": xsrfToken,
                    },
                }
            )
            .then((r) => {
                alert("Login succesful");
                router.push("/profile");
            })
            .catch((err) => {
                console.log("Ошибка при входе:", err.response);
            });
    });
};
</script>
