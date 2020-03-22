/**
 * Created by Administrator on 2020/3/2.
 */
const WebSocket = require('ws'); // 引入模块
const ws = new WebSocket.Server({port:3000},()=>{ // 监听接口
        console.log("socket start")
})


let clients = [];
ws.on('connection',(client)=>{
    //console.log("client:",client)
    clients.push(client)
client.send("欢迎光临");
client.on('message',(msg)=>{
    console.log("来自服务器的数据",msg);
	client.send(msg);
})
client.on('close',(msg)=>{
    console.log("关闭服务器连接")
})
})