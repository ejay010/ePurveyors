import{u,k as f,o as a,m as p,w as s,a as i,b as e,H as _,c as h,h as g,d as o,e as n,n as y,L as b,q as k}from"./app.4b0319af.js";import{_ as v,a as x}from"./GuestLayout.fe5a76c0.js";/* empty css            */import"./ApplicationLogo.21162ded.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./NavBar.e5584b36.js";import"./NavLink.ac0cfb6d.js";const w=o("div",{class:"mb-4 text-sm text-gray-600"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),V={key:0,class:"mb-4 font-medium text-sm text-green-600"},B=["onSubmit"],E={class:"mt-4 flex items-center justify-between"},q={__name:"VerifyEmail",props:{status:String},setup(r){const c=r,t=u(),d=()=>{t.post(route("verification.send"))},m=f(()=>c.status==="verification-link-sent");return(l,L)=>(a(),p(v,null,{default:s(()=>[i(e(_),{title:"Email Verification"}),w,e(m)?(a(),h("div",V," A new verification link has been sent to the email address you provided during registration. ")):g("",!0),o("form",{onSubmit:k(d,["prevent"])},[o("div",E,[i(x,{class:y({"opacity-25":e(t).processing}),disabled:e(t).processing},{default:s(()=>[n(" Resend Verification Email ")]),_:1},8,["class","disabled"]),i(e(b),{href:l.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:s(()=>[n("Log Out")]),_:1},8,["href"])])],40,B)]),_:1}))}};export{q as default};
