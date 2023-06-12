<template>
    <TheMaster>
        <EditSupplierForm />
    </TheMaster>
</template>

<script>
import TheMaster from "@/components/TheMaster.vue";
import EditSupplierForm from "@/components/forms/suppliers/EditSupplierForm.vue";

export default {
   components : {
       TheMaster,
       EditSupplierForm
   }
}
</script>