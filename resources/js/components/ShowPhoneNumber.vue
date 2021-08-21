<template>
   <div>
    <!--
            <p>
                    <button class="btn btn-success" @click.prevent="showNumber()"> عرض الرقم </button>
            </p>
            <p>
                phone number
            </p>
        -->
        <div class="call_button"  @click.prevent="showPhoneBtn()">
            <div class="profile-card__button button--green js-call-btn cursor-pointer">
                <span v-if="showBtn"> عرض الرقم </span>
                <span v-if="showNumber">
                   <a :href="`tel:${postPhone}`" class="no-underline">{{postPhone}}</a>
                </span>
                <i class="fa fa-phone transform rotate-90 mr-5"></i>
            </div>
        </div>

   </div>
</template>

<script>
export default {

    props : ['postPhone'],

     data() {
         return {
            showBtn : true,
            showNumber: false
         }
     },
     methods:  {
          showPhoneBtn() {
           this.showBtn = false;
           this.showNumber =  true;
          }
     }
}
</script>

<style>



</style>
