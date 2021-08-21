<template>
<div class="w-full">

   <div class="flex -mt-10">
     <div class="w-80 h-screen overflow-hidden bg-gray-200 px-3 py-4">
          <div class="text-xl text-right mb-3">دردش الان</div>
          <!-- search div -->
          <div class="w-full relative mb-3">
              <input type="text" class="outline-none border-2 border-gray-200 w-full rounded-xl p-2 focus:border-blue-200" placeholder="ابحث عن الرسائل ">
              <i class="fa fa-search absolute top-4 left-2 text-gray-300"></i>
          </div>
          <!-- users horizontal nav -->
          <div class="flex  mx-1 overflow-x-scroll mb-3">
                <div v-for="user in users"  v-if="user !== null" :key="user.id" class="relative w-1/5">
                    <div>
                        <img :src="`/${user.avatar}`" class="w-12 h-12 rounded-full">
                        <a href="#" class="name text-xs text-gray-500 mt-2" @click.prevent="showMessage(user)">{{user.name}}</a>
                        <div class="active-status rounded-full bg-green-600 w-2 h-2 absolute top-1 right-1"></div>
                    </div>
                </div>
          </div>
          <!-- main users vertical nav -->
          <div class="flex flex-col overflow-auto h-5/6">
                <div v-for="user in users"  v-if="user !== null" :key="'A'+user.id" >
                    <div class="flex h-14 bg-white px-2 py-2 relative rounded-xl mb-3">
                        <div>
                            <img :src="`/${user.avatar}`" class="w-8 h-8 rounded-full">
                        </div>
                        <div class="flex-grow mr-2">
                            <div class="flex text-sm text-gray-400 justify-between">
                                <div class="text-gray-900 font-bold">
                                    <a href="#" @click.prevent="showMessage(user)">{{user.name}}</a>
                                </div>
                                <div>12.04 am</div>
                            </div>
                            <div class="text text-right text-gray-700 text-xs">هلا مستر على كيف الحال</div>
                        </div>
                        <div class="active-status rounded-full bg-green-600 w-2 h-2 absolute bottom-1 left-1"></div>
                    </div>
                </div>
          </div>
     </div>

     <!-- main chat room -->
     <div class="flex-grow h-screen mt-2 flex-col">
        <div class="user-info w-full h-14 flex bg-white px-3 items-center shadow-md">
            <div class="info flex flex-grow">
                <div class="relative">
                    <img :src="`/${selectedUser.avatar}`" class="w-8 h-8 rounded-full">
                    <span class="active-status rounded-full bg-green-600 w-2 h-2 absolute bottom-1 left-2"></span>
                </div>
                <div class="flex text-sm text-gray-400 flex-col mr-2 text-right">
                    <div class="text-gray-900 font-bold"> {{ selectedUser.name }} </div>
                    <div class="active-status rounded-ful">نشط</div>
                </div>
            </div>
            <div class="search w-14 flex items-center justify-around">
                <i class="fa fa-search text-xs text-gray-500"></i>
                <i class="fas fa-ellipsis-v text-xs text-gray-500"></i>
            </div>
        </div>
        <!-- messages -->
        <div  class="h-5/6 w-full py-3 px-3 overflow-y-scroll bg-gray-100 chat"  v-chat-scroll="{always: false, smooth: true, scrollonremoved: true}">
            <div v-for="message in messages" :key="message.id" >
                <div class="message sender flex items-end mb-3" v-if="message.selfOwned">
                    <img :src="`/${message.user.avatar}`" class="w-8 h-8 rounded-full">
                    <div class="msg-box text-right mr-3 bg-blue-400 text-white rounded-tr-xl rounded-bl-xl rounded-tl-xl w-2/5 p-2">
                        <p v-if="message.post">
                            <a :href="`post/${message.post.id }/${message.post.slug}/show`" target="_blank">
                                {{message.post.title}}
                                <img :src="`storage/post_images/${message.post.feature_image}`" alt="post image" style="width:50px;height:50px">
                            </a>
                        </p>
                        <span class="name ">{{message.user.name}}</span>
                        <p class="msg-text text-sm mb-2">{{ message.body }}</p>
                        <span class="time text-gray-100 text-xs">{{moment(message.created_at).calendar()}}</span>
                    </div>
                </div>

                <div class="flex justify-end my-3" v-else>
                    <div class="message receiver flex  w-2/5 items-end">
                        <div class="msg-box text-left ml-3 w-full bg-gray-400 text-white rounded-tr-xl rounded-br-xl rounded-tl-xl p-2">
                            <p v-if="message.post">
                                <a :href="`post/${message.post.id }/${message.post.slug}/show`" target="_blank">
                                            {{message.post.title}}
                                    <img :src="`storage/post_images/${message.post.feature_image}`" alt="post image" style="width:50px;height:50px">
                                </a>

                            </p>
                            <span class="name ">{{message.user.name}}</span>
                            <p class="msg-text text-sm mb-2"> {{ message.body }}</p>
                            <span class="time text-gray-100 text-xs">{{moment(message.created_at).calendar()}}</span>
                        </div>
                        <img :src="`/${message.user.avatar}`"  class="w-8 h-8 rounded-full">
                    </div>
                </div>
            </div>
        </div>
        <!-- submit button and text input -->
        <div class="flex h-14 w-full">
            <input v-model="message" type="text" class="outline-none border-2 flex-grow px-2 rounded-tr-xl rounded-br-xl focus:border-blue-400" placeholder="ارسال رساله" >
            <button @click.prevent="SendMessage()" class="bg-blue-500 text-white w-16 px-2 rounded-lg">ارسال</button>
        </div>
     </div>
 </div>
</div>
</template>

<script>
export default {

//     data: () => {
// // const el = document.getElementById('messages')
// // 	el.scrollTop = el.scrollHeight
//     }

 data () {
     return {
         users : [],
         messages : [],
         selectedUser: {
             id: '',
             name: '',
             avatar: ''
         },
         message : '',
         moment: moment

     }
 },

  mounted() {
          axios.get('/message/users').then((response) => {
              this.users = response.data
          })

          if(this.showMessage (this.selectedUser.id)) {
                setInterval(() => {
                    this.showMessage (this.selectedUser.id);
                }, 1000);
            }

     },
     methods: {
         showMessage (user) {
            axios.get(`/message/user/${user.id}`).then((response) => {
                this.messages = response.data;
                this.selectedUser.id = user.id;
                this.selectedUser.name = user.name;
                this.selectedUser.avatar = user.avatar;
                console.log(this.selectedUser.name)
            });

         },
         SendMessage() {

             if(this.selectedUser.id == '') {
                 alert('الرجاء اختيار مستخدم !');
                 return;
             }
             if(this.message != '' && this.selectedUser.id != '') {
                axios.post('/start-conversation', {
                message: this.message,
                to_id : this.selectedUser.id
                }).then((response) => {
                    this.messages.push(response.data);
                    this.message = ''
                });
             }
         }
     },


}
</script>

<style>
.scrollbar-w-2::-webkit-scrollbar {
  width: 0.25rem;
  height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
  --bg-opacity: 1;
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
  --bg-opacity: 1;
  background-color: #edf2f7;
  background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
  border-radius: 0.25rem;
}
</style>
