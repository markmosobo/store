<template>
    <TheMaster>
        <AddCategoryForm />
    </TheMaster>
</template>

<script>
import TheMaster from "@/components/TheMaster.vue";
import AddCategoryForm from "@/components/forms/categories/AddCategoryForm.vue";

export default {
   components : {
       TheMaster,
       AddCategoryForm
   }
}
</script>