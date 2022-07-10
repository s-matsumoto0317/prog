import express from "express";
import { getResult } from "../controllers/dice.controller.js";

export const diceRouter = express.Router();

diceRouter.post("/", (req, res) => getResult(req, res));
