<template>
    <v-dialog max-width="400" v-model="dialog">
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
                v-bind="activatorProps"
                class="button"
                text="Запись о здоровье"
                variant="flat"
            ></v-btn>
        </template>

        <v-card
            :title="
                record
                    ? 'Редактирование записи о здоровье'
                    : 'Создание записи о здоровье'
            "
        >
            <div class="container">
                <v-form @submit.prevent="saveHealthRecord">
                    <v-sheet class="mx-auto" width="350">
                        <v-textarea
                            v-model="description"
                            label="Описание"
                            required
                        ></v-textarea>
                    </v-sheet>

                    <v-sheet class="mx-auto" width="350">
                        <v-date-input
                            v-model="recordDate"
                            :formatDate="formatDate"
                            clearable
                            placeholder="дд.мм.гг"
                            label="Дата записи"
                            required
                        ></v-date-input>
                    </v-sheet>

                    <v-sheet class="mx-auto" width="350">
                        <v-date-input
                            v-model="vaccinationDate"
                            :formatDate="formatDate"
                            clearable
                            placeholder="дд.мм.гг"
                            label="Дата прививки"
                            required
                        ></v-date-input>
                    </v-sheet>

                    <v-btn class="mt-2 save_btn" type="submit" block
                        >Сохранить</v-btn
                    >
                </v-form>
            </div>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text="Закрыть" @click="dialog = false"></v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script setup>
import axios from "axios";
import { ref, watch } from "vue";

const props = defineProps(["record", "petId"]);
const emit = defineEmits(["record-updated", "record-created"]);

// Диалоговое окно
const dialog = ref(false);

// Данные формы
const description = ref("");
const recordDate = ref(null); // Используем null для обязательного поля
const vaccinationDate = ref(null); // Используем null для обязательного поля

// Наблюдатель за изменением props.record
watch(
    () => props.record,
    (newVal) => {
        if (newVal) {
            description.value = newVal.description;
            recordDate.value = newVal.record_date; // Убедимся, что это строка
            vaccinationDate.value = newVal.vaccination_date; // Убедимся, что это строка
        }
    },
    { immediate: true }
);

// Функция для форматирования даты перед отправкой на сервер
const formatDateForServer = (dateString) => {
    if (!dateString) return null;
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, "0"); // Месяцы с 0
    const day = String(date.getDate()).padStart(2, "0");
    return `${year}-${month}-${day}`;
};

// Функция сохранения записи
const saveHealthRecord = () => {
    // Проверка обязательных полей
    if (!props.petId) {
        console.error("petId is required");
        return;
    }

    if (!description.value) {
        alert("Пожалуйста, заполните описание.");
        return;
    }

    if (!recordDate.value) {
        alert("Пожалуйста, укажите дату записи.");
        return;
    }

    if (!vaccinationDate.value) {
        alert("Пожалуйста, укажите дату прививки.");
        return;
    }

    // Формируем данные для отправки
    const data = {
        description: description.value,
        record_date: formatDateForServer(recordDate.value),
        vaccination_date: formatDateForServer(vaccinationDate.value),
        id_pet: props.petId,
    };

    console.log("Sending data:", data);

    // Если это редактирование существующей записи
    if (props.record && props.record.id) {
        axios
            .put(`/api/health_records/${props.record.id}`, data)
            .then((response) => {
                console.log("Запись о здоровье обновлена:", response.data);
                emit("record-updated", response.data);
                dialog.value = false;
            })
            .catch((error) => {
                console.error(
                    "Ошибка при обновлении записи о здоровье:",
                    error
                );
            });
    }
    // Если это новая запись
    else {
        axios
            .post("/api/health_records", data)
            .then((response) => {
                console.log("Запись о здоровье создана:", response.data);
                emit("record-created", response.data);
                dialog.value = false;
            })
            .catch((error) => {
                console.error("Ошибка при создании записи о здоровье:", error);
            });
    }
};
</script>

<style scoped>
.button {
    background-color: #eaffea;
    color: #037247;
    width: fit-content;
    height: 35px;
    border-radius: 20px;
    font-size: 10px;
    margin-right: 5px;
}

.save_btn {
    background-color: #037247;
    color: white;
    font-size: 14px;
}
</style>
