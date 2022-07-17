import { reactive, ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCompanies() {
    const companies = ref([])
    const chatrooms = ref([])
    const chatroom = ref([])
    const router = useRouter()
    const errors = ref('')
    const userd = ref([])
    const chatable = ref([])
    const isitBlocked = ref(false)
    const messages = ref([])


    const getChatrooms = async(data) => {

        let response = await axios.post('/user_chat', {...data });
        chatrooms.value = response.data.data;
        console.log(chatrooms.value)

    }

    const getUser = async() => {
        let response = await axios.get('/getcity');
        userd.value = response.data;

    }
    const getChatroom = async(data) => {

        let response = await axios.post('/chatroom_message', {...data });
        chatroom.value = response.data.chatroom;
        messages.value = response.data.messages
        chatable.value = response.data.chatable
        isitBlocked.value = response.data.isitBlocked;





        console.log("Has More")
        console.log(response.data)
        return {
            messages: response.data.messages
        }

    }
    const sendMessage = async(data) => {
        errors.value = ''
        try {
            var response = await axios.post('/api/chat', data)
            console.log(response.data);
            //await router.push({name: 'chat.index'})

        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }

    }
    const block = async(data) => {
        //errors.value = ''
        try {
            var response = await axios.post('/block', data)

            console.log(response.data);


            //await router.push({name: 'chat.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }

    }

    // const getCompanies = async() => {
    //     let response = await axios.get('/api/chat.get')
    //     companies.value = response.data.data;
    // }

    // const getCompany = async (id) => {
    //     let response = await axios.get('/api/companies/' + id)
    //     company.value = response.data.data;
    // }

    // const storeCompany = async (data) => {
    //     errors.value = ''
    //     try {
    //         await axios.post('/api/companies', data)
    //         await router.push({name: 'companies.index'})
    //     } catch (e) {
    //         if (e.response.status === 422) {
    //             errors.value = e.response.data.errors
    //         }
    //     }
    // }

    // const updateCompany = async (id) => {
    //     errors.value = ''
    //     try {
    //         await axios.put('/api/companies/' + id, company.value)
    //         await router.push({name: 'companies.index'})
    //     } catch (e) {
    //         if (e.response.status === 422) {
    //            errors.value = e.response.data.errors
    //         }
    //     }
    // }

    // const destroyCompany = async (id) => {
    //     await axios.delete('/api/companies/' + id)
    // }


    return {
        chatrooms,
        errors,
        getChatrooms,
        userd,
        getUser,
        getChatroom,
        chatroom,
        sendMessage,
        chatable,
        block,
        isitBlocked,
        messages


        // getCompany,
        // storeCompany,
        // updateCompany,
        // destroyCompany
    }
}