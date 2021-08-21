<template>
  <div class="chat_button" id="chat">

  <!-- Button trigger modal -->
    <a v-if="showViewConversationONSuccess" href="/messages">
    <button class="profile-card__button button--green js-message-btn cursor-pointer">عرض الرسائل</button>
    </a>
    <button v-else type="button" class="profile-card__button button--blue js-message-btn cursor-pointer" data-toggle="modal" data-target="#exampleModalTwo">
    <span> ارسل رساله  </span>
    <i class="fas fa-comment transform rotate-90 mr-5"></i>
    </button>

    <!-- Modal -->
<div class="modal hidden fixed top-0 left-0 w-full h-full outline-none fade" id="exampleModalTwo" tabindex="-1" role="dialog">
  <div class="modal-dialog relative w-auto pointer-events-none max-w-lg my-8 mx-auto px-4 sm:px-0" role="document">
    <div class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 rounded-lg">
      <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t">
        <h5 class="mb-0 text-lg leading-normal">  ارسال رساله للمعلن {{ author }}</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form @submit.prevent="SaveMessage">

        <div class="relative">
            <textarea v-model="form.message" id="body" class="w-full h-20 outline-none border-2 border-gray-200 p-2" placeholder="اكتب رسالتك هنا ...">
            </textarea>

            <!-- display errors if field has errors using FormError component     -->

            <div v-if="errors" class="text-red-500 py-2 px-4 pr-0 rounded font-bold mb-4 text-right">
                <div>{{ errors.message }}</div>
            </div>

            <div v-if="success" class="text-green-500 py-2 px-4 pr-0 rounded font-bold mb-4 text-right">
                     <div>{{ success }}</div>
            </div>

        </div>
        <div class="flex items-center justify-between p-4 border-t border-gray-300">
            <button type="submit" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-blue-600">ارسال </button>
            <button type="button" class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-white bg-red-600 mr-2" data-dismiss="modal">اعلاق</button>
        </div>
      </form>

    </div>
  </div>
</div>

</div>
</template>

<script>
export default {

    props: ['author','from-id','to-id','post-id','post-route'],

    data () {
        return {
            form : {
                fromId : '',
                toId : '',
                postId: '',
                message: '',

            },
              // array to hold form errors
       errors: null,
       success : '',
       showViewConversationONSuccess : false
        }
    },

  methods: {
       SaveMessage: function() {

       if(this.fromId != '' && this.toId !='' && this.postId != '') {
       axios.post('/api/send/message', {
          'fromId' : this.fromId,
          'toId'   : this.toId,
          'postId' : this.postId,
          'message' :this.form.message
        }).then(res => {

             this.success = "تم ارسال الرساله بنجاح";
             this.showViewConversationONSuccess = true;

        }).catch(err => {
                 this.errors = err.response.data;

        });
       }

        this.form.message = '';

    }
  },
}
</script>

<style>

.hidden {
display: none;
}

</style>
