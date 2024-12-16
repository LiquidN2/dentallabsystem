import { computed } from 'vue';

export function useListingData(listing) {
  let data = [];
  let pagination = null;

  if (!listing) return { data, pagination };

  data = computed(() => listing.data);
  pagination = computed(() => {
    const { data, ...paginationObj } = listing;
    return paginationObj;
  });

  return { data, pagination };
}
