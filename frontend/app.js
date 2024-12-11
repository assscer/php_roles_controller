const apiBaseUrl = "http://localhost:8000";
import "webix/webix.js";
import "webix/webix.css";

webix.ready(() => {
    webix.ui({
        rows: [
            {
                view: "datatable",
                id: "usersTable",
                columns: [
                    { id: "full_name", header: "ФИО", fillspace: true },
                    { id: "login", header: "Логин", width: 150 },
                    { id: "role_name", header: "Роль", width: 150 },
                    { id: "is_blocked", header: "Блокирован", width: 100, template: obj => obj.is_blocked ? "Да" : "Нет" },
                    { id: "actions", header: "Действия", width: 150, template: "<button class='block_btn'>Toggle</button>" }
                ],
                url: `${apiBaseUrl}/users`, // Подключаем API для загрузки пользователей
                onClick: {
                    block_btn: function (e, id) {
                        const item = this.getItem(id);
                        webix.ajax().post(`${apiBaseUrl}/users/block`, { id: item.id }, () => {
                            $$("usersTable").load(`${apiBaseUrl}/users`); // Обновляем таблицу после блокировки
                        });
                    }
                }
            },
            {
                view: "form",
                id: "userForm",
                elements: [
                    { view: "text", name: "full_name", label: "ФИО" },
                    { view: "text", name: "login", label: "Логин" },
                    { view: "text", name: "password", label: "Пароль", type: "password" },
                    { view: "select", name: "role_id", label: "Роль", options: `${apiBaseUrl}/roles/` }, // Добавляем завершающий слэш
                    { view: "button", value: "Сохранить", click: function () {
                            const values = $$("userForm").getValues();
                            webix.ajax().post(`${apiBaseUrl}/users`, values, () => {
                                $$("usersTable").load(`${apiBaseUrl}/users`); // Обновляем таблицу после добавления
                                $$("userForm").clear(); // Очищаем форму
                            });
                        }
                    }
                ]
            }
        ]
    });
});
