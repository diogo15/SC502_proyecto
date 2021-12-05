
<script>
    module.exports ={
        props: {

            },
            methods: {

            },
            components: {
                'footer': httpVueLoader(site_url + 'js/componentes/footer.vue')
            }
        }
</script>
<style>
    * footer{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
footer{
    width: 100%;
    background:#884511;
    color: black;
}
.container-foter-allO{
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding: 40px;
}
.container-body{
    display: flex;
    justify-content: space-around; 
}
.column{
    max-width: 400px;

}
.column h1{
    font-size: 20px;
}
.column p{
    font-size: 13px;
    margin-top: 14px;
    color: #C7C7C7;
}
.column2{
    max-width: 400px;

}
.column2 h1{
    font-size: 18px;
}
.row{
    margin-top: 14px;
    display: flex;
}
.row img{
    width: 30px;
    height: 30px;
}
.row label{
    margin-top: 6px;
    margin-left: 4px;
    color: #C7C7C7;
}
.column3{
    max-width: 400px;

}
.column3 h1{
    font-size: 18px;
}
.row2{
    margin-top: 20px;
    display: flex;
}
.row2 img{
    width: 30px;
    height: 30px;
}
.row2 label{
    margin-top: 10px;
    max-width: 150px;
    margin-left: 4px;
    color: #C7C7C7;
}
.container-footer{
    max-width: 100%;
    background-color: #3f1f06;
    margin-top: 10px;
}
.footer{
    max-width: 1200px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    padding: 15px;
}

.copyright{
    color: #C7C7C7;

}
.copyright a{
    color: #C7C7C7;
    text-decoration: none;
    font-weight: bold;
    font-size: small;
}
.informacion a{
    text-decoration: none;
    color: #C7C7C7;
    font-size: small;
}
@media screen and (max-width: 1000px) {
    .container-body{
        flex-wrap: wrap;
    }
}
</style>