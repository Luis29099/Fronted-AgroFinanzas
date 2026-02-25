package com.agrofinanzas.mobile.ui.viewmodel

import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.agrofinanzas.mobile.data.repository.AgroRepository
import kotlinx.coroutines.flow.MutableStateFlow
import kotlinx.coroutines.flow.StateFlow
import kotlinx.coroutines.flow.asStateFlow
import kotlinx.coroutines.launch

data class DashboardUiState(
    val loading: Boolean = false,
    val products: List<String> = emptyList(),
    val summary: Map<String, Any> = emptyMap(),
    val error: String? = null
)

class DashboardViewModel(
    private val repository: AgroRepository = AgroRepository()
) : ViewModel() {

    private val _uiState = MutableStateFlow(DashboardUiState())
    val uiState: StateFlow<DashboardUiState> = _uiState.asStateFlow()

    fun loadDashboard() {
        viewModelScope.launch {
            _uiState.value = _uiState.value.copy(loading = true, error = null)
            runCatching {
                val products = repository.getProducts().products
                val summary = repository.getSummary().summary
                products to summary
            }.onSuccess { (products, summary) ->
                _uiState.value = DashboardUiState(
                    products = products,
                    summary = summary
                )
            }.onFailure {
                _uiState.value = DashboardUiState(error = it.message ?: "Error cargando dashboard")
            }
        }
    }
}
