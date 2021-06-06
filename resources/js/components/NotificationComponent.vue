<template>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{ total }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: -97px;">
                <span class="dropdown-header">لديك {{ total }} اشعار</span>

                <div v-for="(notification , index) in notifications" :key="index">
                    <div class="dropdown-divider"></div>
                    <a :href="notification.action_url" class="dropdown-item">
                        <i class="fa fa-envelope mr-2"></i> {{ notification.body }}
                    </a>
                </div>
                
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer"></a>
            </div>
        </li>
</template>

<script>
    import axios from "axios"
    export default {
        name: 'notification',
        data() {
            return {
                notifications : [],
                total : 0
            }
        },
        mounted () {
            window.Echo.channel("new-order").listen("NewOrder", e => {
                let audio = new Audio('http://soundbible.com/mp3/heavy-rain-daniel_simon.mp3');
                audio.play();
                this.fetch();
            }),
            this.fetch();
        },
        methods: {
            fetch() {
            axios.get("/notifications").then(({ data: { total, notifications } }) => {
                this.total = total;
                // this.data = notifications;
                this.notifications = notifications.map(({ id, data, created }) => {
                return {
                    title: data.title,
                    body: data.body,
                    action_url: data.action_url + "?notification_id=" + id
                };
                });
            });
            },
            readAll() {
            axios.get("/readall").then(() => {
                this.fetch()
            });
            }
        },
    }
</script>