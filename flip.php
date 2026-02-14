<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .flip-container {
  perspective: 1000px;
  width: 350px;
  margin: 100px auto;
}

.flip-card {
  width: 100%;
  position: relative;
  transform-style: preserve-3d;
  transition: transform 0.8s ease;
}

.flip-card.flipped {
  transform: rotateY(180deg);
}

.flip-face {
  position: absolute;
  width: 100%;
  backface-visibility: hidden;
  background: #fff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.back {
  transform: rotateY(180deg);
}

/* form styling */
input {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
}

button {
  width: 100%;
  padding: 10px;
}

span {
  color: #007bff;
  cursor: pointer;
}

</style>
<body>
    <div class="flip-container">
  <div class="flip-card" id="flipCard">

    <!-- Login Form -->
    <div class="flip-face front">
      <h2>Login</h2>
      <form>
        <input type="email" placeholder="Email">
        <input type="password" placeholder="Password">
        <button type="submit">Login</button>
      </form>
      <p>
        Don't have an account?
        <span onclick="flip()">Sign up</span>
      </p>
    </div>

    <!-- Signup Form -->
    <div class="flip-face back">
      <h2>Sign Up</h2>
      <form>
        <input type="text" placeholder="Name">
        <input type="email" placeholder="Email">
        <input type="password" placeholder="Password">
        <button type="submit">Create Account</button>
      </form>
      <p>
        Already have an account?
        <span onclick="flip()">Login</span>
      </p>
    </div>

  </div>
</div>
<script>
    <script>
  function flip() {
    document.getElementById("flipCard").classList.toggle("flipped");
  }
</script>
</script>
</body>
</html>