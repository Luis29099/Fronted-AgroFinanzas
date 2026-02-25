package com.agrofinanzas.mobile.data.model

data class ProductsResponse(
    val products: List<String> = emptyList()
)

data class SummaryResponse(
    val error: Boolean,
    val summary: Map<String, Any> = emptyMap()
)
