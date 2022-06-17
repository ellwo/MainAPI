<template>
  <div class="p-4 mx-auto bg-yellow-200 dark:text-blue-300">
    <div class="flex bg-slate-400 justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header page-title">About Us Component {{User.city.name}}</div>

          <div class="card-body body-content">
            Hi, Online Web tutor. I am About Us Page {{time}}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:['username'],
  created() {
      setInterval(() => this.setTime(), 1000);

    console.log("This is about component "+this.username);
  },
  data:function () {
      return {
          User:JSON.parse (this.username),
          time:''

      }
   }
   ,methods:{

       setTime(){
           let date=new Date();
           this.time=date.toLocaleTimeString();
       }



   }
};
</script>
