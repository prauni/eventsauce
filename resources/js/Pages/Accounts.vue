<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Accounts Listing
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table-fixed w-full">
							<thead>
								<tr class="bg-gray-100">
									<th class="px-4 py-2 w-20">No.</th>
									<th class="px-4 py-2">Name</th>
									<th class="px-4 py-2">Email</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(row,key) in $page.props.users">
									<td class="border px-4 py-2">{{ row.id }}</td>
									<td class="border px-4 py-2">{{ row.name }}</td>
									<td class="border px-4 py-2">{{ row.email }}</td>
								</tr>
							</tbody>
						</table>
						<Paginator :paginator="paginator" />
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>
<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated';
import Paginator from "@/Components/Paginator";
export default {
    components: {
		BreezeAuthenticatedLayout,
		Paginator,
	},
	props: {
		paginator: Object
	},
}
</script>