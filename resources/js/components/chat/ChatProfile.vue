<template>


 <div class="px-1 mt-1 ">
        <!--  here is the chat rooms list items -->



        <template v-for="item in chats" :key="item.id">




<router-link :to="{name:'inbox.showchatroom',
params:{type:type,chattings:chattings,chat_room_id:item.id } }">
<div class="flex p-2 m-2 transition-transform duration-300 transform bg-white rounded shadow-md cursor-pointer dark:bg-primary-dark dark:text-light entry hover:scale-105">
    <div class="flex-2">
        <div class="relative w-12 h-12">
            <img class="w-12 h-12 mx-auto rounded-full bg-primary" :src="item.chatable.avatar" alt="U" />
            <template v-if="chat_room_id==item.id">
           <span class="absolute bottom-0 right-0 w-4 h-4 border-2 border-white rounded-full bg-dark"></span>

            </template>
            <span class="absolute bottom-0 right-0 w-4 h-4 bg-gray-400 border-2 border-white rounded-full"></span>
        </div>
    </div>
    <div class="flex-1 px-2">
        <div class="w-32 truncate"><span class="text-gray-800 dark:text-light">{{item.chatable.name}}</span></div>
        <div class="w-32 truncate">

            <template v-if="item.lasttmessage!=null&&item.lasttmessage.type_message=='text'">
            <small class="text-gray-600 dark:text-gray-400">

            {{item.lasttmessage!=null?item.lasttmessage.content:''}}  </small>
            </template>
            <template v-if="item.lasttmessage!=null&&item.lasttmessage.type_message=='order'">
            <small class="text-gray-600 dark:text-gray-400">
                طلب جديد {{ item.lasttmessage.content.order.id}}
                </small>
            </template>


            </div>
    </div>
    <div class="text-right flex-2">
        <div><small class="text-gray-500"></small></div>
        <div>
            <template v-if="item.unread_messages_count!=0">
            <small class="inline-block w-6 h-6 text-xs leading-6 text-center text-white bg-red-500 rounded-full">
                {{item.unread_messages_count}}
                </small>
                </template>


            <!-- @if($unreadedcount !=0)

            <small class="inline-block w-6 h-6 text-xs leading-6 text-center text-white bg-red-500 rounded-full">
                {{$unreadedcount}}
            </small>
            @endif -->
        </div>
    </div>
</div>

</router-link>


</template>
</div>


</template>

<script>
import { defineComponent, onMounted,reactive,ref } from 'vue'
import useCompanies from '../../composables/companies';

export default  defineComponent({


    props:{
        userid:{
            type:String,
            required:false

        }
        ,chat_room_id:{
            type:String,
            required:false
            },
            type:{
                type:String,
                required:false
            },
            chattings:{
                type:String,
                required:false
            }

    },

    beforeRouteUpdate(to, from,next){

        console.log("Chat Profile------------------- -  "  )

        console.log("chat room id"+from.params.chat_room_id)
        console.log("Chat Profile------------------- -  "  )
        next();
    },






    setup(props) {

 const { chatrooms, getChatrooms } = useCompanies();

        console.log("on set Up")
        var chats=ref([])
        const data={
            "type":props.type,
            "chatting_id":props.chattings
        };


               console.log("chattings chatprofile"+props.chattings);

               console.log("userid chatprofile"+props.userid);

                   Echo.private("usernotfiyMessage."+props.userid).listen("MessageRescive",(e)=>{

console.log("from ChtPRofile Echo usernotify");
                           console.log(e.message);


               if(e.message.sender!=props.chattings)
               {
                pushnew(e.message);

               }
           });







        onMounted(()=>{
        console.log("on Mounted")

        getChatrooms(data).then(()=>{
        chats.value=chatrooms.value

            })
        })





        const pushnew=(message)=>{
            var chatroom2;
            var index;
            chats.value.forEach(element => {
                if(element.id==message.chat_room_id){
                   index=chats.value.indexOf(element);
                }
            });


var res=chats.value.at(index);
            chatroom2={
                chatable:{
avatar: res.chatable.avatar,
id: res.chatable.id,
name: res.chatable.name,
username:res.chatable.username},


from_id: res.from_id,
from_type: res.from_type,
id:res.id,
isitBlocked: res.isitBlocked,


lasttmessage:{
chat_room_id: message.chat_room_id,
content: message.content,
created_at: message.created_at,
id:message.id,
is_readed: message.is_readed,
sender: message.sender,
type_message: message.type_message},



updated_at: res.updated_at
,
to_id: res.to_id
,to_type: res.to_type
,unread_messages_count: res.unread_messages_count++};

            // chatroom2.id=750;
     console.log(chatroom2);

            // var first=chats.value.at(0);
             chats.value.splice(index, 1);
chats.value.unshift(chatroom2);

           console.log (index);

        }











        return{
            chatrooms,
            chats,
            pushnew,
            userid:props.userid,
            chat_room_id:props.chat_room_id,
            chattings:props.chattings,
            type:props.type

        }




    },
    activated(props){

        console.log("Is Activeted");
        console.log("Is Activeted"+props.chattings);
    }
})
</script>
