<template>
    <TheMaster>

    </TheMaster>
</template>
<script>
import TheMaster from "@/components/TheMaster.vue";
import axios from "axios";
export default{
    data(){
        return {
            product: [],
            form: {
                quantity: '',
                amount: ''
            }
        }
    },
    components: {
        TheMaster
    },
    methods: {
        getData(){
            axios.get('api/products/'+this.$route.params.id).then((response) => {
                // this.product = response.data.product

                console.log(response)
            })
        }
    },
    mounted(){
        this.getData();
    }
}
</script>