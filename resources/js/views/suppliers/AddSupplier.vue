<template>
    <TheMaster>
        <AddSupplierForm />
    </TheMaster>
</template>

<script>
import TheMaster from "@/components/TheMaster.vue";
import AddSupplierForm from "@/components/forms/suppliers/AddSupplierForm.vue";

export default {
   components : {
       TheMaster,
       AddSupplierForm
   }
}
</script>