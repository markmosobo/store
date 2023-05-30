<template>
<TheMaster>
<RestockProductForm />
</TheMaster>
</template>

<script>
 import TheMaster from "@/components/TheMaster.vue";
 import RestockProductForm from "@/components/forms/products/RestockProductForm.vue";

export default{
    components:{
        TheMaster,
        RestockProductForm
    }
}
</script>