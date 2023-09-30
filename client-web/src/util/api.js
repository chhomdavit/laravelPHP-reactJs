// import axios from 'axios' 
// export const base_url = "http://localhost:8000/api/"
// export const request = (method,url,data) => { 
//     var headers = {
//         "Accept": "application/json",
//         "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8;application/json;",
//         // 'Content-Type': 'multipart/form-data',
//         "Access-Control-Allow-Origin": "*"
//     }
//     // if(data instanceof FormData){
//     //     header = {  'Content-Type': 'multipart/form-data' }
//     // }
//     const instance = axios.create({ headers })
//     return instance.request({
//         method : method,
//         url : base_url + url,
//         data : data,
//     }).then(res=>{
//         return res
//     }).catch(error=>{
//         return error
//     })
// }



import axios from "axios"
import { message } from "antd"
const baseUrl = "http://localhost:8000/api/"

export const request = (method="",url="",data={},headers={}) => {
    return axios({
        url : baseUrl + url,
        method : method,
        data : data,
        headers: {
            ...headers,
            "Accept": "application/json",
            // "Content-Type": "charset=UTF-8;application/json",
            // 'Content-Type': 'multipart/form-data',
            "Access-Control-Allow-Origin": "*"
          }
    }).then(res=>{
        return res
    }).catch(err=>{
        if(err.code === "ERR_NETWORK"){
            message.error("Can not connect to server. Plase contact administration!")
            return false
        }
        return false
    })
}
