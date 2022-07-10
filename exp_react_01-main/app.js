// app.js

import express from "express";
import { omikujiRouter } from "./routes/omikuji.route.js";
// じゃんけんのルーティングを読み込む
import { jankenRouter } from "./routes/janken.route.js";
import { diceRouter } from "./routes/dice.route.js";

const app = express();
// ↓POSTでデータを受け取るために必要
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

const port = 3001;

app.get("/", (req, res) => {
  res.json({
    uri: "/",
    message: "Hello Node.js!",
  });
});

app.use("/omikuji", (req, res) => omikujiRouter(req, res));
// じゃんけんのルーティングを追加
app.use("/janken", (req, res) => jankenRouter(req, res));
app.use("/dice", (req, res) => diceRouter(req, res));

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`);
});
