<template>

    <div>
        Hi there {{userd.name}}
    </div>

</template>
<script>
import useCompanies from "../composables/companies.js";
import { onMounted } from "vue";
export default {


    props:{
        id:{
            type:Number,
            required:true
        }
    },


    setup(props){

        const {userd,getUser}=useCompanies();



        onMounted(getUser)

        return{

            userd
        }



    },

    }


</script>
