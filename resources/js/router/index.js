import { createRouter, createWebHistory } from "vue-router";

import ChatIndex from '../components/chat/ChatIndex.vue'
import ChatRoom from '../components/chat/ChatRoom.vue'
import App from '../components/App.vue'
// import CompaniesCreate from '../components/companies/CompaniesCreate'
// import CompaniesEdit from '../components/companies/CompaniesEdit'

const routes = [{
        path: '/inbox',
        name: 'inbox.index',
        component: ChatIndex,
        props: true
    },
    {
        path: '/inbox/:type/:chattings',
        name: 'inbox.show',
        component: ChatRoom,
        props: true
    },
    {
        path: '/inbox/:type/:chattings/:chat_room_id',
        name: 'inbox.showchatroom',
        component: ChatRoom,
        props: true
    },
    {
        path: '/chaty',
        name: 'chat.index',
        component: ChatIndex,
        props: true
    },
    {
        path: '/chat/:id:type/show',
        name: 'chat.show',
        component: ChatRoom,
        props: true

    }
    // {
    //     path: '/companies/create',
    //     name: 'companies.create',
    //     component: CompaniesCreate
    // },
    // {
    //     path: '/companies/:id/edit',
    //     name: 'companies.edit',
    //     component: CompaniesEdit,
    //     props: true
    // }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
