

<template>
            
 
            <li class="dropdown" style="top:15px">


            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <span class="fa fa-bell fa-lg" style="font-size:20px; color:#71a0c8"></span>
                
             
             <span  v-if="notifications.length" class="badge"  v-text="notifications.length"></span>
         </a>


            <ul class="dropdown-menu dropdown-menu-right" v-if="notifications.length"  >
                <li v-for="notification in notifications">

                    <a @click="markAsRead(notification)" :href="notification.data.link" v-text="notification.data.text"></a></li>
                    <li class="divider"></li>
                    <li><a @click="markAllAsRead" href="#">Marcar notificaciones como leídas</a></li>
            </ul>   

         </li>

</template>

<script>
    export default {

        data(){

            return{

                notifications: []
            }
        },
        mounted() {
            axios.get('/notificaciones').then(res => {

                this.notifications = res.data;
            })
        },

        methods: {

            markAsRead(notification){
                axios.patch('/notificaciones/' + notification.id)
                .then(res=> {
                    this.notifications = res.data;
                });
            },

            markAllAsRead(){
                this.notifications.forEach(notification =>  {
                    this.markAsRead(notification);
                });
            }
        }
    }
</script>
