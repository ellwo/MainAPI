
<code>
git clone https://github.com/ellwo/MainAPI.git
</code>
<br>


<code>
  cd mainap
  </code>
  <br>
  <code> 
    composer install
  </code>
  <br>
  <code>
  npm install
    </code>
    <br>
      <code>
  npm run dev 
      </code>
      <br>
      <code>
  cp .env.example .env
      </code>
      <br>
     <code>
 php artisan key:generate
      </code>
      <br>
الان تروح تنشئ قاعدة بيانات وتسميها نفس الاسم الي بيكون داخل ال env   ->  DATABASE 

  <h3> بعدها تروح تسوي الاكواد التالية</h3>

<code>
  php artisan migrate
  </code>
  <br>
  <code>php artisan db:seed</code>
<br>
<code> php artisan serve  
</code>
<br>
<h2> الان روح لل
  http://127.0.0.1/login
  email:admin@me.com
  password:admin775212843
</h2>

