const express = require("express");

const app = express();
const router = express.Router();
app.use(express.json());

app.get("/", (req, res, next) => {
  res.send("Api running");
});
router.route('/api/v1/login', async (req, res, next) => {
  console.log('yes');
  res.send("App runing")
})
app.listen(() => {
  console.log(`Server Runing on Port: `);
});
console.log("jai ho")