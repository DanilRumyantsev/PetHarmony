<template>
    <div class="reports-container">
        <header class="header">
            <ul class="no-markers">
                <li class="li">
                    <img src="/assets/logos/LOGO_short.svg" class="logo" />
                </li>
                <li class="li">
                    <router-link to="/profile" class="route">
                        Профиль
                    </router-link>
                </li>
                <li class="li">
                    <router-link to="/categories" class="route">
                        Категории здоровья
                    </router-link>
                </li>
                <li class="li">Отчеты</li>
                <li class="li">
                    <router-link to="/settings" class="route">
                        Настройки
                    </router-link>
                </li>
            </ul>
        </header>

        <div class="head">
            <h1 class="h1">Отчеты по дате</h1>
        </div>

        <!-- Основной контейнер: левая панель + правый блок с таблицей -->
        <div class="main-container">
            <!-- Левая панель -->
            <div class="left_container">
                <v-date-picker v-model="selectedDate"></v-date-picker>
                <v-btn
                    color="primary"
                    @click="generateReport"
                    block
                    style="margin-top: 15px"
                >
                    Сгенерировать отчет
                </v-btn>
            </div>

            <!-- Правый блок с таблицей -->
            <div class="right_container" v-if="reportData">
                <h2>Записи, созданные {{ reportData.date }}</h2>

                <div
                    v-for="(records, table) in reportData.results"
                    :key="table"
                    class="table-section"
                >
                    <h3>{{ humanizeTable(table) }} ({{ records.length }})</h3>
                    <table v-if="records.length > 0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название / Описание</th>
                                <th>Создано</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="record in records" :key="record.id">
                                <td>{{ record.id }}</td>
                                <td v-if="table === 'users'">
                                    {{ record.name }}
                                </td>
                                <td v-else-if="table === 'pets'">
                                    {{ record.name }}
                                </td>
                                <td v-else-if="table === 'health_records'">
                                    {{ record.description }}
                                </td>
                                <td v-else-if="table === 'categories'">
                                    {{ record.name }}
                                </td>
                                <td>{{ formatDate(record.created_at) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p v-else>Нет записей.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            selectedDate: this.getCurrentDate(),
            reportData: null,
        };
    },
    methods: {
        getCurrentDate() {
            const date = new Date();
            return date.toISOString().split("T")[0]; // YYYY-MM-DD
        },

        formatDateForServer(dateString) {
            if (!dateString) return null;
            const date = new Date(dateString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, "0");
            const day = String(date.getDate()).padStart(2, "0");
            return `${year}-${month}-${day}`;
        },

        async generateReport() {
            const formattedDate = this.formatDateForServer(this.selectedDate);

            console.log("Выбранная дата:", this.selectedDate);
            console.log("Отправляемая дата:", formattedDate);

            try {
                const response = await axios.post("/reports/generate", {
                    date: formattedDate,
                });

                this.reportData = response.data;
            } catch (error) {
                console.error("Ошибка при генерации отчета:", error);
                alert("Ошибка загрузки данных. Проверьте консоль.");
            }
        },

        formatDate(dateString) {
            if (!dateString) return "";
            const date = new Date(dateString);
            return `${date.toLocaleDateString()} ${date.toLocaleTimeString()}`;
        },

        humanizeTable(name) {
            const titles = {
                users: "Пользователь",
                pets: "Питомцы",
                health_records: "Медицинские записи",
                categories: "Категории",
            };
            return titles[name] || name;
        },
    },
};
</script>

<style scoped>
.reports-container {
    padding: 20px;
}

.head {
    margin-bottom: 20px;
}

/* Основной контейнер: левая и правая части */
.main-container {
    display: flex;
    gap: 40px;
}

.left_container {
    width: 300px;
    flex-shrink: 0;
}

.right_container {
    flex-grow: 1;
    overflow-x: auto;
}

.table-section {
    margin-bottom: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}
</style>
