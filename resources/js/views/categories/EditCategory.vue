<template>
    <TheMaster>
        <EditCategoryForm />
    </TheMaster>
</template>

<script>
import TheMaster from "@/components/TheMaster.vue";
import EditCategoryForm from "@/components/forms/categories/EditCategoryForm.vue";

export default {
   components : {
       TheMaster,
       EditCategoryForm
   }
}
</script>