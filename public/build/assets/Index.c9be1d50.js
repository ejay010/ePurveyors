import{_ as m}from"./AdminLayout.7a2e4501.js";import{_ as d}from"./NavLink.ac0cfb6d.js";import{o,m as p,w as a,e as r,a as l,b as h,H as _,d as t,c as i,p as u,F as x,t as s}from"./app.4b0319af.js";import"./ApplicationLogo.21162ded.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./ResponsiveNavLink.b31ad363.js";/* empty css            */const f={class:"container mx-auto my-4"},y={class:"flex flex-col m-4 h-96 sm:h-1/2 md:h-1/5 overflow-auto"},g={class:"table-auto mx-auto bg-white rounded-lg shadow"},b=t("thead",{class:"border-b border-logoprimary-dark"},[t("tr",null,[t("th",{class:"p-4"},"ID"),t("th",{class:"p-4"},"Status"),t("th",{class:"p-4"},"Island"),t("th",{class:"p-4"},"Marina"),t("th",{class:"p-4"},"Customer Name"),t("th",{class:"p-4"},"Customer Email"),t("th",{class:"p-4"},"Customer Telephone"),t("th",null,"View or Edit")])],-1),k={class:""},w={class:"py-2 px-4 text-center"},v={class:"py-2 px-4 text-center"},C={class:"py-2 px-4 text-center"},R={class:"py-2 px-4 text-center"},V={class:"py-2 px-4 text-center"},B={class:"py-2 px-4 text-center"},E={class:"py-2 px-4 text-center"},$={__name:"Index",props:{customerRequests:Array},setup(n){return(c,N)=>(o(),p(m,null,{header:a(()=>[r(" All customer requests ")]),default:a(()=>[l(h(_),{title:"All Customer Requests"}),t("div",f,[t("div",y,[t("table",g,[b,t("tbody",k,[(o(!0),i(x,null,u(n.customerRequests,e=>(o(),i("tr",{key:e.id},[t("td",w,s(e.id),1),t("td",v,s(e.status),1),t("td",C,s(e.island),1),t("td",R,s(e.marina),1),t("td",V,s(e.name),1),t("td",B,s(e.email),1),t("td",E,s(e.tel_phone),1),t("td",null,[l(d,{href:c.route("admin.customerRequest.show",{id:e.id}),class:"m-2 block text-logoprimary-light hover:text-logoprimary-dark"},{default:a(()=>[r("View")]),_:2},1032,["href"]),l(d,{href:c.route("admin.customerRequest.edit",{id:e.id}),class:"m-2 block text-logoprimary-light hover:text-logoprimary-dark"},{default:a(()=>[r("Edit")]),_:2},1032,["href"])])]))),128))])])])])]),_:1}))}};export{$ as default};