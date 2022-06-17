<template>


      <div class="flex flex-row min-h-full mt-4 md:flex h-3/4 lg:flex-row">

          <div class="hidden w-2/5 sm:flex sm:flex-col lg:w-2/5 bg-success">
        <div x-data="perfectScroll" class="relative h-full" @mousemove="update">

              <chat-profile-vue :userid="userid" :chat_room_id="id"/>
              </div>
          </div>


          <div class=" lg:w-3/5 bg-info">

        <!--  here is the chatrooms-->
       <div  class="flex flex-col h-full sm:flex sm:flex-col sm:h-full" >

     <div class="sticky p-2 ">
        <h2 class="py-1 text-xl border-b-2 border-gray-200 ">
            <div class="relative w-24 h-24">
                    <img class="mx-auto rounded-full " src="profile-image.png" alt="chat-user" />
                    <span class="absolute bottom-0 right-0 w-4 h-4 bg-gray-400 border-2 border-white rounded-full"></span>
                </div>
                </h2>

                </div>


<div  class=" sm:flex sm:flex-col sm:h-3/4 h-3/4 sm:p-1 messages"  >

        <div class="text-center"> <button>loda more</button>  </div>

                 <!-- here date by date group by--->

<div x-data="perfectScroll" id="messages_view" class="relative h-full pb-4" @mousemove="update">
        <template v-for="(mess,index) in chatroom" :key="index">
             <div>
                 <!-- here date by date --->
                <h1 class="sticky top-0 mx-auto text-center">{{index}}</h1>

                <template  v-for="message in chatroom[index]" :key="message.id">
                 <!-- v-for="mess in chatroom.message" :key="mess.id"> -->

                    <!-- if message from him-->

                    <template v-if="message.sender!=userid">

                    <div class="flex mb-4 text-xs sm:text-sm message">
                                <div class="flex-2">
                                    <div class="relative w-12 h-12">

                                        <img class="w-4 h-4 mx-auto bg-cover rounded-full sm:w-12 sm:h-12 bg-primary" src="profile-image.png" alt="chat-user" />
                                        <span class="absolute bottom-0 right-0 w-4 h-4 bg-gray-400 border-2 border-white rounded-full"></span>
                                    </div>
                                </div>
                                <div class="flex-1 px-2">
                                    <div class="inline-block p-2 px-6 text-gray-700 bg-gray-300 rounded-full">
                                        <span >{{message.content}}</span>
                                    </div>
                                    <div class="pl-4"><small  class="text-gray-500" ></small></div>
                                </div>
                            </div>
                    </template>

                            <!-- her from me -->
                            <template v-if="message.sender==userid">
<div class="flex mb-4 text-xs text-right sm:text-sm message me">
    <div class="flex-1 px-2">
        <div class="inline-block p-2 px-6 text-white bg-blue-600 rounded-full">
            <span >{{message.content}}</span>
        </div>
        <div class="pr-4"><small class="text-gray-500" ></small></div>
    </div>
                             </div>
                            </template>
                            <!--
 -->



                   </template>



            </div>
       </template>
       <div id="lastone"><hr></div>
       </div>

        </div>



        <!-- her is the Form-->

<form class="sticky text-xs sm:text-sm" @submit.prevent="sendMessageForm" dir="rtl" >

    <div class="">



        <input type="hidden" v-model="form.chat_room_id" name="chat_room_id" >



        <div class="flex bg-white rounded-lg shadow write">
            <div class="flex items-center content-center p-4 pr-0 text-center justify-items-stretch flex-3">
                <span class="block text-center text-gray-400 hover:text-gray-800">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" class="w-6 h-6"><path d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </span>
            </div>
            <div class="flex-1">
                <textarea v-model="form.content" name="message"  class="block w-full px-2 py-2 bg-transparent outline-none" rows="1" placeholder="اكتب الرسالة..." autofocus></textarea>
            </div>
            <div class="flex items-center content-center w-32 p-2 flex-2">
                <div class="flex-1 text-center">
                    <span class="text-gray-400 hover:text-gray-800">
                        <span class="inline-block align-text-bottom">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" class="w-6 h-6"><path d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                        </span>
                    </span>
                </div>
                <div class="flex-1">
                    <button  type="submit" class="inline-block w-10 h-10 bg-blue-400 rounded-full">
                        <span class="inline-block align-text-bottom">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4 text-white"><path d="M5 13l4 4L19 7"></path></svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>



</div>






          </div>





      </div>










</template>

<script>
import useCompanies from "../../composables/companies.js";
import App from '../../components/App.vue';
import ChatProfileVue from "./ChatProfile.vue";
import { defineComponent, onMounted, onUpdated, reactive, ref } from "vue";

export default defineComponent({

       props:{
             userid: {
            required: false,
            type: String
        },
            id: {
            required: false,
            type: String
        }
       },

    components:{

        'chat-profile-vue':ChatProfileVue


    },

    beforeRouteUpdate(to, from,next){

        console.log("be for Route Update")
        console.log("id to"+to.params.id)
        console.log("id from"+from.params.id)
        console.log("chat room from befroe")
        console.log(this.chatroom)

        this.getChatroom(to.params.id)

        next();
    }


    ,





    setup(props)  {
        const {chatroom, getChatroom,errors,sendMessage} = useCompanies()
//         var chats=ref([])
           let openchatrooms=ref(false)
           let chtroom=ref([])


             const form = reactive({
            'content': '',
            'chat_room_id':props.id,
            'sender':props.userid,
            'type_message':'text',
            'is_readed':0
            // 'email': '',
            // 'address': '',
            // 'website': '',
        })



           const sendMessageForm=async()=>{



             var  lastindex=Object.keys(chatroom.value).at(Object.keys(chatroom.value).length-1) ;





             await sendMessage({...form})




             chatroom.value[lastindex].push({
                 "content":form.content,
                 "sender":form.sender,
                 "type_message":form.type_message,
                 "chat_room_id":form.chat_room_id,
                 "is_readed":form.is_readed
             });
var element = document.getElementById("lastone");
element.lastElementChild.scrollIntoView({ behavior: 'smooth' });

               console.log(form)
               form.content=''

           }

           onUpdated(()=>{

//                    console.log("on Uptaded")
//         console.log(props.id)


//                 getChatroom(props.id).then(()=>{


// var element = document.getElementById("messages_view");
// element.lastElementChild.lastElementChild.scrollIntoView({ behavior: 'smooth' });
// console.log("loded");
// console.log(props.userid)
//    })
           })






            onMounted(()=>{



                console.log("id from mount"+props.id)




                getChatroom(props.id).then(()=>{


chtroom.value=chatroom.value
var element = document.getElementById("lastone");
element.lastElementChild.scrollIntoView({ behavior: 'smooth' });

console.log("loded");
console.log(props.userid)
   })









//              getUser().then(()=>{

//         getChatrooms(userd.value.id).then(()=>{

// //   chats.value=chatrooms.value;

//             chats.value=chatrooms.value

//             })

// ///
//     })
//             console.log('chatrooms from on mounted chatindex')
// console.log(chats)




        })

        // }

        // const deleteCompany = async (id) => {
        //     if (!window.confirm('Are you sure?')) {
        //         return
        //     }

        //     await destroyCompany(id);
        //     await getCompanies();
        // }
        const openchat=()=>{
            openchatrooms.value=!openchatrooms.value
            console.log("opch")

        }

        return {
            id:props.id,
            chatroom,
            openchatrooms,
            openchat,
            chtroom,
            form,
            sendMessageForm,
            getChatroom
        }
    },
    data(){
        return {

        }
    }
})
</script>
