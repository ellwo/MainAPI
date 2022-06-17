<template>



<!-- <div class="w-full " x-data="{openchatrooms:false}">

    <div class="sticky top-0 z-30 flex-row flex-1 py-4 bg-white">
        <div class="flex-1 px-12">
            <span class="inline-block text-gray-700 align-bottom xl:hidden hover:text-gray-900">

                <span @click="openchatrooms=!openchatrooms" class="block w-6 h-6 p-1 rounded-full hover:bg-gray-400">

                    <svg class="w-4 h-4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </span>
            </span>
            <span @click="openchatrooms=!openchatrooms" class="inline-block ml-8 text-gray-700 align-bottom lg:hidden hover:text-gray-900">
                <span class="block w-6 h-6 p-1 rounded-full hover:bg-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </span>
            </span>
            <span class="inline-block text-gray-700">
                Status: <span class="inline-block w-4 h-4 align-text-bottom bg-green-400 border-2 border-white rounded-full"></span> <b>Online</b>
                <span class="inline-block align-text-bottom">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4"><path d="M19 9l-7 7-7-7"></path></svg>
                </span>
            </span>

            <span class="inline-block ml-8 text-gray-700 align-bottom hover:text-gray-900">

                <span class="block w-6 h-6 p-1 rounded-full hover:bg-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </span>
            </span>
        </div>

        <div class="flex-1 text-right">

        </div>
    </div>

    <div class="flex flex-row md:px-4 ">


        <chat-profile-vue :type="type" :chattings="chattings"  :userid="userid"/>



        <div class="flex-1">
        <div class="w-64 text-xl bg-gray-600">




            <template x-if="this.id!=undefined">
                <div class="bg-red-400">
                    Yes is not undefined

                </div>
            </template>

        </div>


        </div>




</div>

</div>  -->





 <div class="relative flex flex-row min-h-full mt-4 md:flex h-3/4 lg:flex-row">

          <div class="hidden w-full sm:flex sm:flex-col lg:w-2/5 ">
        <div x-data="perfectScroll" class="relative h-full" @mousemove="update">

              <chat-profile-vue :type="type" :chattings="chattings" :userid="chattings" :chat_room_id="chat_room_id"/>
              </div>
          </div>
          </div>

</template>

<script>
import useCompanies from "../../composables/companies.js";
import App from '../../components/App.vue';
import ChatProfileVue from "./ChatProfile.vue";
import { onMounted, ref, render } from "vue";

export default {

       props:{
             id: {
            required: false,
            type: String
        } ,
           userid: {
            required: false,
            type: String
        }
        ,
        type:{
            type:String,
            required:false
        },
        chat_room_id:{
            type:String,
            required:false
        },
        chattings:{
            type:String,
            required:false
        }
       },

    components:{

        'chat-profile-vue':ChatProfileVue


    },




    setup(props)  {
        const {userd,getUser, chatrooms, getChatrooms } = useCompanies()
        let hasid=ref(false)
//         var chats=ref([])
//  const perfectScroll = () => {
//         let ps

//         const update = () => {
//             if (ps) {
//                 ps.update()
//             }
//         }

//         return {
//             init(){
//                 ps = new PerfectScrollbar(this.$el, {
//                     wheelSpeed: 2,
//                     wheelPropagation: false,
//                     minScrollbarLength: 20
//                 });
//             },
//             update
//         }
//     }






            onMounted(()=>{


//              getUser().then(()=>{

//         getChatrooms(userd.value.id).then(()=>{

// //   chats.value=chatrooms.value;

//             chats.value=chatrooms.value

//             })

// ///
//     })
//             console.log('chatrooms from on mounted chatindex')
// console.log(chats)



          if(props.id!=undefined){
                console.log("yes it has")
                setHasid
            }
            else{
    console.log("no it has")

            }






        })


            const setHasid=()=>{

                hasid.value=true;
            }







        // const pushnew=()=>{


        //     console.log(chatrooms.value[0])






        //     chats.value[0].unread_messages.push({
        //         'sender':userd.value.id,
        //         'id':51,
        //         'type_message':'text',
        //         'content':"hello",
        //         'chat_room_id':2,
        //         'is_readed':false
        //     });












        // }

        // const deleteCompany = async (id) => {
        //     if (!window.confirm('Are you sure?')) {
        //         return
        //     }

        //     await destroyCompany(id);
        //     await getCompanies();
        // }

        return {
            id:props.id,
            hasid,
            setHasid,
            userid:props.userid,
            type:props.type,
            chat_room_id:props.chat_room_id,
            chattings:props.chattings
        }
    },
    data(props){

       return{ tid:props.id}

    }
}
</script>
