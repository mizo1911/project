//const express = require(express)          
import express from 'express'
import bcrypt from 'bcrypt'

const app = express() 

const port = 3000;

const users = [] 

app.use(express.json())

app.post('register.php', async(req,res) => {
    try {
        const {email , password} = req.body
        const finduser = users.find((data) =>email == data.email)
        if(finduser){
            res.status(400).send("wrong email or password")
        }
        const hashpass = await bcrypt.hash(password,10)
        users.push({email,password:hashpass})
        console.log(users)
        res.status(201).send("register succsseful")
    } catch {
        res.status(500).send("internal server error")
    }
})

app.post('/login.php', async(req,res) => {
    try {
        const {email , password} = req.body
        const finduser = users.find((data) =>email == data.email)
        if(!finduser){
            res.status(400).send("wrong email or password")
        }
        const matchpass = await bcrypt.compare(password , finduser.password)
        if(matchpass)
        {
            res.status(200).send("login success")
        }else{
            res.status(400).send("wrong email or password")

        }
    } catch {
        res.status(500).send("internal server error")
    }
})

app.listen(port,() => {
    console.log(`server is started on port  ${port}`)
})