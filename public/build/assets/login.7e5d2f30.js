import{u as n,o as r,c as m,a as p,d as s,q as c,f as a,s as i,b as o}from"./app.4b0319af.js";import{A as u}from"./ApplicationLogo.21162ded.js";/* empty css            */import"./_plugin-vue_export-helper.cdc0426e.js";const _={class:"min-h-screen flex flex-col"},f={class:"flex flex-col mx-auto border rounded-md shadow-md p-2 md:p-6 m-2 text-center"},w=s("h1",null,"Administrator",-1),h=["onSubmit"],b={class:"flex justify-between items-center m-2"},x=s("label",null,"Email Address",-1),g={class:"flex justify-between items-center m-2"},v=s("label",null,"Password",-1),y=["disabled"],E={__name:"login",setup(A){const e=n({email:"",password:""}),l=()=>{e.post(route("admin.login.post"),{onFinish:()=>e.reset("password")})};return(V,t)=>(r(),m("div",_,[p(u,{class:"h-48 w-48 md:h-80 md:w-80 mx-auto"}),s("div",f,[w,s("form",{class:"form",onSubmit:c(l,["prevent"])},[s("div",b,[x,a(s("input",{"onUpdate:modelValue":t[0]||(t[0]=d=>o(e).email=d),type:"email",class:"m-2 rounded-md",name:"email",id:"email"},null,512),[[i,o(e).email]])]),s("div",g,[v,a(s("input",{"onUpdate:modelValue":t[1]||(t[1]=d=>o(e).password=d),type:"password",class:"m-2 rounded-md",name:"password",id:"password"},null,512),[[i,o(e).password]])]),s("button",{type:"submit",class:"w-full bg-logoprimary border rounded p-4 shadow-lg text-white",disabled:o(e).processing},"Login",8,y)],40,h)])]))}};export{E as default};